/**
 * Fontawesome Javascript SVG api
 *
 * @see {@link https://fontawesome.com/how-to-use/with-the-api/setup/getting-started}
 *
 * Available Libraries:
 * @example
 * // @fortawesome/free-regular-svg-icons/index
 * // @fortawesome/free-brands-svg-icons/index
 * // @fortawesome/pro-light-svg-icons/index
 * // @fortawesome/pro-regular-svg-icons/index
 * // @fortawesome/pro-solid-svg-icons/index
 */

import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'

// Import specific icons required
import {
  faUserAstronaut,
  faRocket,
  faSpaceShuttle,
  faUser,
} from '@fortawesome/free-solid-svg-icons/index';

// Import entire icon set
import '@fortawesome/fontawesome-free/js/all';
// import '@fortawesome/fontawesome-pro/js/all';

// Add specific icons required
library.add(faUserAstronaut, faRocket, faSpaceShuttle, faUser, fas, far, fab);

// Replace any existing <i> tags with <svg> and set up a MutationObserver to
// continue doing this as the DOM changes.
export default () => dom.watch();
