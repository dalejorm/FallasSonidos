import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Initialization for ES Users
import {
    Collapse,
    Modal,
    Ripple,
    initTE,
  } from "tw-elements";
  
  initTE({ Collapse, Modal, Ripple });