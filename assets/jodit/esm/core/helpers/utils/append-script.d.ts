/*!
 * Jodit Editor (https://xdsoft.net/jodit/)
 * Released under MIT see LICENSE.txt in the project root for license information.
 * Copyright (c) 2013-2024 Valeriy Chupurnov. All rights reserved. https://xdsoft.net
 */
/**
 * @module helpers/utils
 */
import type { IViewBased } from "jodit/esm/types";
export type Loader = (jodit: IViewBased, url: string) => Promise<any>;
export interface CallbackAndElement {
    callback: EventListener;
    element: HTMLElement;
}
/**
 * Append script in document and call callback function after download
 */
export declare const appendScript: (jodit: IViewBased, url: string, callback: (this: HTMLElement, e?: Event) => any) => CallbackAndElement;
/**
 * Load script and return promise
 */
export declare const appendScriptAsync: Loader;
/**
 * Download CSS style script
 */
export declare const appendStyleAsync: Loader;
export declare const loadNext: (jodit: IViewBased, urls: string[], i?: number) => Promise<void>;
export declare function loadNextStyle(jodit: IViewBased, urls: string[], i?: number): Promise<void>;
