/*!
 * Jodit Editor (https://xdsoft.net/jodit/)
 * Released under MIT see LICENSE.txt in the project root for license information.
 * Copyright (c) 2013-2024 Valeriy Chupurnov. All rights reserved. https://xdsoft.net
 */
/**
 * @module plugins/clean-html
 */
import type { IJodit, Nullable, IDictionary } from "jodit/esm/types";
/**
 * @private
 */
export declare function visitNodeWalker(jodit: IJodit, nodeElm: Node, allowTags: IDictionary | false, denyTags: IDictionary | false, currentSelectionNode: Nullable<Node>): boolean;
