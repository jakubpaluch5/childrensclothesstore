// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import singleProduct from './routes/single-product';
import kolekcje from './routes/kolekcje';




/** Populate Router instance with DOM routes */
const routes = new Router({
  common,
  home,
  singleProduct,
  kolekcje,
  
  
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
