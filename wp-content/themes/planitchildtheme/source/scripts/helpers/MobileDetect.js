import { isMobile } from '@/helpers/helpers';

export default class MobileDetect {
	constructor() {
		this.$html = $('html');
	}

	setMobileClass() {
		const mobileCheck = isMobile() ? 'mobile' : 'no-mobile';
		this.$html.addClass(mobileCheck);
	}

	setEventBindings() {
		this.setMobileClass();
	}

	init() {
		this.setEventBindings();
	}
}