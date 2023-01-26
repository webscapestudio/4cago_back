import burger from "./modules/burger.js";
import openCloseItem from "./modules/openCloseItem.js";
import meatballs from "./modules/meatballs.js";
import dropdownFilter from "./modules/dropdownFilter.js";
import notifications from "./modules/notifications.js";
import loginDrop from "./modules/loginDrop.js";
import MicroModal from "micromodal";
import { tab } from "./modules/tab.js";
import SlimSelect from "slim-select";
import tags from "./modules/tags";
import ReadSmore from "read-smore";
try {
    new SlimSelect({
        select: "#slim-select",
        showContent: "down",
    });

    new SlimSelect({
        select: "#slim-select-job",
        showContent: "down",
    });
} catch (e) {
    console.log("error");
}

const readMores = document.querySelectorAll(".js-read-smore");

const options = {
    // blockClassName: "read-more",
    moreText: "Показать больше",
    lessText: "Скрыть",
};

// Pass in options param
ReadSmore(readMores, options).init();
MicroModal.init({
    disableScroll: true, // [6]
});

tab(
    ".category__tabs_wrap",
    ".tabs-btn",
    ".category__tabs",
    ".category__tabs_content"
);
tinymce.init({
    selector: '.tiny_editor',
    plugins: 'anchor autolink charmap codesample emoticons link lists searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tableofcontents footnotes mergetags autocorrect typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    language: 'ru',
   });