/*!
 * Jodit Editor (https://xdsoft.net/jodit/)
 * Released under MIT see LICENSE.txt in the project root for license information.
 * Copyright (c) 2013-2024 Valeriy Chupurnov. All rights reserved. https://xdsoft.net
 */
/**
 * @module plugins/backspace
 */
import type { IJodit } from "jodit/esm/types";
/**
 * For first item in list on backspace try move his content in new P
 *
 * @example
 * ```html
 * <ul><li>|first</li><li>second</li></ul>
 * ```
 * Result
 * ```html
 * <p>|first</p><ul><li>second</li></ul>
 * ```
 *
 * @private
 */
export declare function checkUnwrapFirstListItem(jodit: IJodit, fakeNode: Node, backspace: boolean): boolean;
