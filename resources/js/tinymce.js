import 'tinymce/tinymce';
import 'tinymce/themes/silver';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/link';
import 'tinymce/plugins/code';
import 'tinymce/plugins/table';

window.tinymce.init({
    selector: '#tinymce',
    promotion: false,
    plugins: 'link lists table',
    theme_advanced_buttons1_add: "fontsizeselect",
    toolbar: 'undo redo | fontfamily | blocks fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    font_family_formats: 'Roboto=roboto;Roboto Condensed=Roboto Condensed;Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;Times New Roman=times new roman,times,serif',

    content_style:
        "@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700;900&display=swap');",
    mergetags_list: [
        {value: 'First.Name', title: 'First Name'},
        {value: 'Email', title: 'Email'},
    ]
});
