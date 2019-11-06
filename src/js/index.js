import "../scss/main.scss";

let previousPos = 0;
let __scrolling = false;
let buffer = 100;
let body = null;
let sections = [];

window.onload = init

const TheCannery = {};

function init() {

	body = document.querySelector('body')
	sections = document.querySelectorAll('.section')

	fixSidebarContentHeight()

	setInitialActiveSection()
	takeOverBrowserScroll()
	bindNavigation()
}

function fixSidebarContentHeight() {
	const sidebars = document.querySelectorAll('.section-sidebar')
	sidebars.forEach(sidebar => {
		// get height for content (sidebar - logo)
		const _logo = sidebar.querySelector('.section-sidebar-logo')
		const _content = sidebar.querySelector('.section-sidebar-content')
		// get the right height
		const max = (+sidebar.offsetHeight - 100 /*account for 50px padding*/)
		const logo = (+_logo.offsetHeight + 30 /*account for margin bottom*/)
		const contentHeight = (max - logo)
		// set the right height
		_content.style.height = contentHeight
	})
}

function setInitialActiveSection() {
	const numberOfSections = sections.length || 0

	if (0 < numberOfSections) {

		for (var i = 0; i < numberOfSections; i++) {
			const __section = sections[i]
			if (0 === i) {
				__section.classList.add('active')
			}
			__section.setAttribute('data-section-key', i)
		}
	}
}

function takeOverBrowserScroll() {

	window.onscroll = (e) => {
		const newPos = window.scrollY

		if (__scrolling) {
			e.preventDefault();

			return false;
		}

		if ( newPos < (previousPos - buffer) ) {
			// switch
			switchSection(-1)
			previousPos = newPos
		}

		if ( newPos > (previousPos + buffer) ) {
			// switch
			switchSection(1)
			previousPos = newPos
		}
	}
}

function switchSection(n) {
	n = n || 0

	const currentSection = document.querySelector('.section.active')
	const currentKey = +currentSection.getAttribute('data-section-key')
	const newKey = (n + currentKey)
	const nextSection = sections.item(newKey)

	if (nextSection) {
		currentSection.classList.remove('active')
		nextSection.classList.add('active')

		scrollToNextSection(nextSection)
	}
}

function scrollToNextSection(nextSection) {
	__scrolling = true;

	body.style.overflow = 'hidden'

	window.scrollTo({
	  top: nextSection.offsetTop,
	  left: 0,
	  behavior: 'smooth'
	});


	setTimeout(() => {

		body.style.overflow = ''
		previousPos = window.scrollY
		__scrolling = false

	}, 1000)
}


function bindNavigation() {
	const navItems = document.querySelectorAll('.section a')
	navItems.forEach(navItem => {
		if (navItem.href
			&& navItem.href !== ''
			&& -1 !== navItem.href.indexOf('#')) {
			const navLink = navItem.href.split('#')[1]

			navItem.onclick = (e) => {
				e.preventDefault()
				e.stopPropagation()
				const currentSection = document.querySelector('.section.fullpage.active')
				const nextSection = document.querySelector('#'+navLink)

				if (currentSection && nextSection && (nextSection !== currentSection)) {
					currentSection.classList.remove('active')
					nextSection.classList.add('active')

					scrollToNextSection(nextSection)
				}
			}
		}
	})
}