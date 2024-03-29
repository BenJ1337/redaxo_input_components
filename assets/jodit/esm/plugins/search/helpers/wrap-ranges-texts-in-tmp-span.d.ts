/*!
 * Jodit Editor (https://xdsoft.net/jodit/)
 * Released under MIT see LICENSE.txt in the project root for license information.
 * Copyright (c) 2013-2024 Valeriy Chupurnov. All rights reserved. https://xdsoft.net
 */
/**
 * @module plugins/search
 */
import type { ICreate, ISelectionRange } from "jodit/esm/types";
/**
 * @private
 */
export declare function wrapRangesTextsInTmpSpan(rng: ISelectionRange, restRanges: ISelectionRange[], ci: ICreate, root: HTMLElement): void;
/**
 * @private
 */
export declare function getSelectionWrappers(root: HTMLElement): HTMLElement[];
/**
 * @private
 */
export declare function clearSelectionWrappers(root: HTMLElement): void;
/**
 * @private
 */
export declare function clearSelectionWrappersFromHTML(root: string): string;
/**
 * @private
 */
export declare function isSelectionWrapper(node: unknown): boolean;
