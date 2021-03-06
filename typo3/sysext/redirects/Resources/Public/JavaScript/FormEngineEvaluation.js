/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
define(["require","exports","TYPO3/CMS/Backend/FormEngineValidation"],(function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.FormEngineEvaluation=void 0;class o{static registerCustomEvaluation(e){i.registerCustomEvaluation(e,o.evaluateSourceHost)}static evaluateSourceHost(e){return"*"===e?e:(e.includes("://")||(e="http://"+e),new URL(e).host)}}t.FormEngineEvaluation=o}));