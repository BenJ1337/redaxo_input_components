/*!
 * Jodit Editor (https://xdsoft.net/jodit/)
 * Released under MIT see LICENSE.txt in the project root for license information.
 * Copyright (c) 2013-2024 Valeriy Chupurnov. All rights reserved. https://xdsoft.net
 */
/**
 * @module modules/uploader
 */
import type { Nullable } from "jodit/esm/types";
export * from "./process-old-browser-drag";
export * from "./data-uri-to-blob";
export * from "./build-data";
export * from "./send";
export * from "./send-files";
export declare function hasFiles(data: Nullable<DataTransfer>): data is DataTransfer;
export declare function hasItems(data: Nullable<DataTransfer>): data is DataTransfer;
