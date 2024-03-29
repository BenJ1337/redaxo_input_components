/*!
 * Jodit Editor (https://xdsoft.net/jodit/)
 * Released under MIT see LICENSE.txt in the project root for license information.
 * Copyright (c) 2013-2024 Valeriy Chupurnov. All rights reserved. https://xdsoft.net
 */
import { appendScriptAsync, appendStyleAsync } from "jodit/esm/core/helpers/utils/append-script.js";
import { kebabCase } from "jodit/esm/core/helpers/string/kebab-case.js";
import { normalizeName } from "jodit/esm/core/plugin/helpers/utils.js";
import { IS_PROD } from "jodit/esm/core/constants.js";
const styles = new Set();
/**
 * @private
 */
export async function loadStyle(jodit, pluginName) {
    const url = getFullUrl(jodit, pluginName, false);
    if (styles.has(url)) {
        return;
    }
    styles.add(url);
    return appendStyleAsync(jodit, url);
}
/**
 * Call full url to the script or style file
 * @private
 */
function getFullUrl(jodit, name, js) {
    name = kebabCase(name);
    return (jodit.basePath +
        'plugins/' +
        name +
        '/' +
        name +
        '.' +
        (js ? 'js' : 'css'));
}
/**
 * @private
 */
export function loadExtras(items, jodit, extrasList, callback) {
    try {
        const needLoadExtras = extrasList.filter(extra => !items.has(normalizeName(extra.name)));
        if (needLoadExtras.length) {
            load(jodit, needLoadExtras, callback);
        }
    }
    catch (e) {
        if (!IS_PROD) {
            throw e;
        }
    }
}
/**
 * Download plugins
 * @private
 */
function load(jodit, pluginList, callback) {
    pluginList.map(extra => {
        const url = extra.url || getFullUrl(jodit, extra.name, true);
        return appendScriptAsync(jodit, url)
            .then(callback)
            .catch(() => null);
    });
}
