// Function to get the current cursor position
function getCursorPosition() {
    const textBody = document.getElementById('text-body');
    return textBody.selectionStart;
}

// Function to insert the specified text at the cursor position
function insertTextAtCursor(text) {
    const textBody = document.getElementById('text-body');
    const position = getCursorPosition();
    const currentValue = textBody.value;
    const newValue = currentValue.slice(0, position) + text + currentValue.slice(position);
    textBody.value = newValue;
    // Set the cursor position after the inserted text
    textBody.setSelectionRange(position + text.length, position + text.length);
    textBody.focus(); // Ensure the textarea retains focus
}

// Functions for each edit button
function setBold() {
    insertTextAtCursor('<b></b>');
}

function setItalic() {
    insertTextAtCursor('<i></i>');
}

function setUL() {
    insertTextAtCursor('\n<ul>\n  <li></li>\n</ul>\n');
}

function setOL() {
    insertTextAtCursor('\n<ol>\n  <li></li>\n</ol>\n');
}

function setBR() {
    insertTextAtCursor('<br>');
}

function setAnchor() {
    insertTextAtCursor(`<a href="link"></a>`);
}