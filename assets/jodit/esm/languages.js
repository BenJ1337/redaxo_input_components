/*!
 * Jodit Editor (https://xdsoft.net/jodit/)
 * Released under MIT see LICENSE.txt in the project root for license information.
 * Copyright (c) 2013-2024 Valeriy Chupurnov. All rights reserved. https://xdsoft.net
 */
import { isArray } from "jodit/esm/core/helpers/checker/is-array.js";
import en from "jodit/esm/langs/en.js";
import ar from "jodit/esm/langs/ar.js";
import cs_cz from "jodit/esm/langs/cs_cz.js";
import de from "jodit/esm/langs/de.js";
import es from "jodit/esm/langs/es.js";
import fr from "jodit/esm/langs/fr.js";
import he from "jodit/esm/langs/he.js";
import hu from "jodit/esm/langs/hu.js";
import id from "jodit/esm/langs/id.js";
import it from "jodit/esm/langs/it.js";
import ja from "jodit/esm/langs/ja.js";
import ko from "jodit/esm/langs/ko.js";
import mn from "jodit/esm/langs/mn.js";
import nl from "jodit/esm/langs/nl.js";
import pl from "jodit/esm/langs/pl.js";
import pt_br from "jodit/esm/langs/pt_br.js";
import ru from "jodit/esm/langs/ru.js";
import tr from "jodit/esm/langs/tr.js";
import zh_cn from "jodit/esm/langs/zh_cn.js";
import zh_tw from "jodit/esm/langs/zh_tw.js";
import keys from "jodit/esm/langs/keys.js";
let exp = {};
exp = {
    ar,
    cs_cz,
    de,
    en,
    es,
    fr,
    he,
    hu,
    id,
    it,
    ja,
    ko,
    mn,
    nl,
    pl,
    pt_br,
    ru,
    tr,
    zh_cn,
    zh_tw
};
/* Unpack array to hash */
const get = (value) => value ? value.default || value : {}, hashLang = {};
if (isArray(get(keys))) {
    get(keys).forEach((key, index) => {
        hashLang[index] = key;
    });
}
Object.keys(exp).forEach((lang) => {
    const list = get(exp[lang]);
    if (isArray(list)) {
        exp[lang] = {};
        list.forEach((value, index) => {
            exp[lang][hashLang[index]] = value;
        });
    }
    else {
        exp[lang] = list;
    }
});
export default exp;
