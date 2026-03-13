import "./bootstrap";

import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

import Swal from "sweetalert2";
window.Swal = Swal;

