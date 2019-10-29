import "../scss/main.scss";

window.onload = () => {
	window.scrollTo({
	  top: 0,
	  left: 0,
	  behavior: 'smooth'
	});
	takeOverBrowserScroll()
}

function takeOverBrowserScroll() {

	const body = document.getElementsByTagName('body')[0]
	const sections = document.getElementsByTagName('section')
	const numberOfSections = sections.length || 0

	const buffer = 60;

	if (0 < numberOfSections) {

		for (var i = 0; i < numberOfSections; i++) {
			const __section = sections[i]
			if (0 === i) __section.className += ' active'
			__section.setAttribute('data-section-key', i)
		}

		body.style.paddingTop = `${window.innerHeight + (numberOfSections * buffer)}px`

		window.scrollTo(0,0)
	}


	let previousPos = 0;
	window.onscroll = (e) => {
		const newPos = window.scrollY

		if ( newPos < previousPos ) {
			// scrolling up
			if ( newPos < (previousPos - buffer) ) {
				// switch
				switchSection(-1)
				previousPos = newPos
			}
		} else {
			// scrolling down
			if ( newPos > (previousPos + buffer) ) {
				// switch
				switchSection(1)
				previousPos = newPos
			}
		}
	}

	function switchSection(n) {
		body.style.overflow = 'hidden'
		n = n || 0
		const currentSection = document.getElementsByClassName('active')[0]
		const currentKey = +currentSection.getAttribute('data-section-key')
		const newKey = (n + currentKey)
		const nextSection = sections.item(newKey)
		if (nextSection) {
			currentSection.className = currentSection.className.substr(0, currentSection.className.indexOf(' active'))
			nextSection.className += ' active'
		}
		body.style.overflow = ''
	}
}