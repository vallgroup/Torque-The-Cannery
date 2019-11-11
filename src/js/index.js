import "../scss/main.scss";
// set our variables
let previousPos = 0;
let __scrolling = false;
let buffer = 100;
let body = null;
let sections = [];
// init only when window loads
window.onload = init
// not used for now, but may be needed
const TheCannery = {};
// bind our code, get our variables
function init() {
	//
	body = document.querySelector('body')
	sections = document.querySelectorAll('.section')
	// add active class to the inital section
	// and data-section-keye to all of them
	setInitialActiveSection()
	if (1199 < window.innerWidth) {
		// bind the scrolling functionality
		takeOverBrowserScroll()
		// Makes sure the sidebar content is
		// always side bar height - logo height
		fixSidebarContentHeight()
	} else {
		bindMobileMenu()
	}
	// bind the navigation scroll
	bindNavigation()
}
// Content height = sidebar height - logo height
function fixSidebarContentHeight() {
	// get sidebar for each section
	const sidebars = document.querySelectorAll('.section-sidebar')
	sidebars.forEach(sidebar => {
		// get height for content (sidebar - logo)
		const _logo = sidebar.querySelector('.section-sidebar-logo')
		const _content = sidebar.querySelector('.section-sidebar-content')
		// get the right height
		const max = (+sidebar.offsetHeight - 60 /*account for 50px padding*/)
		const logo = (+_logo.offsetHeight + 30 /*account for margin bottom*/)
		const contentHeight = (max - logo)
		// set the right height
		_content.style.height = contentHeight
	})
}
// assign active class and data-section-key to sections
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
// bind scrolling functionality
// wrapper for window.onscroll
function takeOverBrowserScroll() {
	window.onscroll = (e) => {
		// get current scrollY
		const newPos = window.scrollY
		// If we are scrolling, then
		// prevent the browser from scrolling
		if (__scrolling) {
			e.preventDefault();
			return false;
		}
		// check direction of scroll
		if ( newPos < (previousPos - buffer) ) {
			// scrolling up, go back a section
			switchSection(-1)
			previousPos = newPos
		} else
		if ( newPos > (previousPos + buffer) ) {
			// scrolling down, go to next section
			switchSection(1)
			previousPos = newPos
		}
	}
}
// go up or down a section
function switchSection(n) {
	n = n || 0 // 0 will have no effect
	// get our references: curretn section, next section,  etc
	const currentSection = document.querySelector('.section.active')
	const currentKey = +currentSection.getAttribute('data-section-key')
	const newKey = (n + currentKey) // use n to determine next section
	const nextSection = sections.item(newKey)
	// scroll
	scrollFromCurrentToNext(currentSection, nextSection)
}
// this function extracts the logic to
// move from one section to the next so
// that it can be re-used by multiple functions
function scrollFromCurrentToNext(currentSection, nextSection) {
	// check if sections exists
	// and are not the same
	if (currentSection && nextSection
		&& (nextSection !== currentSection)) {
		// switch active classes
		currentSection.classList.remove('active')
		nextSection.classList.add('active')
		// take the user to the next section
		scrollToNextSection(nextSection)
	}
}
// smoothly scroll the user to next section
function scrollToNextSection(nextSection) {
	// prevent window.onscroll from running
	__scrolling = true;
	// prevent user from scrolling the page
	// while we scroll them to next section
	body.style.overflow = 'hidden'
	// scroll the user to next section
	window.scrollTo({
	  top: nextSection.offsetTop,
	  left: 0,
	  behavior: 'smooth'
	});
	// once the scroll animation is done
	setTimeout(() => {
		// give control back to browser and user
		body.style.overflow = ''
		__scrolling = false
		// set new scrolling position
		previousPos = window.scrollY
	}, 1000)
}
// scroll to corresponding section when user
// clicks on any anchor tag, with a hashtag
function bindNavigation() {
	// get all anchor tags inside sections
	const navItems = document.querySelectorAll('.section a, .mobile-header-navigation-nav a')
	// iterate through and check for hashtags
	navItems.forEach(navItem => {
		if (navItem.href
			&& navItem.href !== ''
			&& -1 !== navItem.href.indexOf('#')) {
			// we found a hashtag, lets get the string
			const navLink = navItem.href.split('#')[1]
			// scroll the user to next section
			// when this anchor is clicked on
			const handleNavClick = (e) => {
				e.preventDefault()
				// e.stopPropagation()
				const currentSection = document.querySelector('.section.fullpage.active')
				const nextSection = document.querySelector('#'+navLink)
				// scroll
				scrollFromCurrentToNext(currentSection, nextSection)
			}
			// bind scroll for this anchor
			navItem.onclick = handleNavClick
		}
	})
}

function bindMobileMenu() {
	// const navigation = document.querySelector('.mobile-header-navigation')
	const toggle = document.querySelector('.mobile-header-navigation-toggle a')
	const toggleImg = document.querySelector('.mobile-header-navigation-toggle img')
	const nav = document.querySelector('.mobile-header-navigation-nav')
	let active = false;

	const openNav = () => {
		const currentSrc = toggleImg.src.split('/').reverse()
		nav.classList.add('active')

		currentSrc[0] = 'close.png'
		toggleImg.src = currentSrc.reverse().join('/')
		active = true
	}

	const closeNav = () => {
		const currentSrc = toggleImg.src.split('/').reverse()
		nav.classList.remove('active')

		currentSrc[0] = 'hamburger.png'
		toggleImg.src = currentSrc.reverse().join('/')
		active = false
	}

	toggle.onclick = e => {
		e.preventDefault();
		if (active) {
			closeNav()
		} else {
			openNav()
		}
	}

	nav.onclick = e => {
		closeNav()
	}
}