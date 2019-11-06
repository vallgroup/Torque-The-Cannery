import "../scss/main.scss";

window.onload = () => {
	takeOverBrowserScroll()
	bindNavigation()

	window.scrollTo({
	  top: 0,
	  left: 0,
	  behavior: 'smooth'
	});
}

let previousPos = 0;
let __scrolling = false;

function takeOverBrowserScroll() {

	const body = document.getElementsByTagName('body')[0]
	const sections = document.getElementsByTagName('section')
	const numberOfSections = sections.length || 0

	const buffer = 100;

	if (0 < numberOfSections) {

		for (var i = 0; i < numberOfSections; i++) {
			const __section = sections[i]
			if (0 === i) __section.className += ' active'
			__section.setAttribute('data-section-key', i)
		}
	}


	window.onscroll = (e) => {
		const newPos = window.scrollY

		if (__scrolling) {
			e.preventDefault();

			let timeout = setTimeout(() => {

				__scrolling = false
				previousPos = window.scrollY

			}, 400)


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

	function switchSection(n) {
		body.style.overflow = 'hidden'
		n = n || 0

		const currentSection = document.querySelector('.section.active')
		const currentKey = +currentSection.getAttribute('data-section-key')
		const newKey = (n + currentKey)
		const nextSection = sections.item(newKey)

		if (nextSection) {
			currentSection.classList.remove('active')
			nextSection.classList.add('active')
			__scrolling = true;

			window.scrollTo({
			  top: nextSection.offsetTop,
			  left: 0,
			  behavior: 'smooth'
			});
		}
		body.style.overflow = ''
	}

	function getActiveElement() {
		const sections = document.getElementsByTagName('section')
		let _section = null;
		for (var i = 0; i < sections.length; i++) {
			const __section = sections[i]
			if (-1 !== __section.className.indexOf('active')) {
				_section = __section
				return _section
			}
		}

	}
}


function bindNavigation() {
	const navItems = document.querySelectorAll('.section-content-navigation .torque-menu-item-wrapper a')
	navItems.forEach(navItem => {
		if (navItem.href && navItem.href !== '') {
			const navLink = navItem.href.split('#')[1]

			navItem.onclick = (e) => {
				e.preventDefault()
				e.stopPropagation()
				const currentSection = document.querySelector('.section.fullpage.active')
				const nextSection = document.querySelector('#'+navLink)

				if (currentSection && nextSection && (nextSection !== currentSection)) {
					currentSection.classList.remove('active')
					nextSection.classList.add('active')
					__scrolling = true;
					window.scrollTo({
					  top: nextSection.offsetTop,
					  left: 0,
					  behavior: 'smooth'
					});
					setTimeout(() => {
						__scrolling = false
					}, 1000)
				}
			}
		}
	})
}