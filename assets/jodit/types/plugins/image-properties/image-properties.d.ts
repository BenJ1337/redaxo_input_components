/*!
 * Jodit Editor (https://xdsoft.net/jodit/)
 * Released under MIT see LICENSE.txt in the project root for license information.
 * Copyright (c) 2013-2024 Valeriy Chupurnov. All rights reserved. https://xdsoft.net
 */
/**
 * [[include:plugins/image-properties/README.md]]
 * @packageDocumentation
 * @module plugins/image-properties
 */

import type { IJodit } from "jodit/esm/types";
import { Plugin } from "jodit/esm/modules";
import "./config";
/**
 * Show dialog with image's options
 */
export declare class imageProperties extends Plugin {
    protected state: {
        image: HTMLImageElement;
        ratio: number;
        sizeIsLocked: boolean;
        marginIsLocked: boolean;
    };
    private activeTabState;
    protected onChangeMarginIsLocked(): void;
    protected onChangeSizeIsLocked(): void;
    private form;
    /**
     * Dialog for form
     */
    private dialog;
    /**
     * Open dialog editing image properties
     *
     * @example
     * ```javascript
     * const editor = Jodit.makeJodit('#editor');
     *     img = editor.createInside.element('img');
     *
     * img.setAttribute('src', 'images/some-image.png');
     * editor.s.insertImage(img);
     * // open the properties of the editing window
     * editor.events.fire('openImageProperties', img);
     * ```
     */
    protected open(): void | false;
    /**
     * Create form for edit image properties
     */
    private makeForm;
    /**
     * Set input values from image
     */
    private updateValues;
    /**
     * Apply form's values to image
     */
    private onApply;
    /**
     * Open image editor dialog
     */
    private openImageEditor;
    /**
     * Open popup with filebrowser/uploader buttons for image
     */
    private openImagePopup;
    /** @override **/
    protected afterInit(editor: IJodit): void;
    /** @override */
    protected beforeDestruct(editor: IJodit): void;
}
