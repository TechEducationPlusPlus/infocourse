'use strict';

var _snackbar = require('./snackbar');

var _snackbar2 = _interopRequireDefault(_snackbar);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var instance = void 0;

function snackbar() {
  if (!instance) {
    instance = new _snackbar2.default();
  }
  return instance;
}

module.exports = snackbar();