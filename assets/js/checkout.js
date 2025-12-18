alert("hallo test");

document.addEventListener('DOMContentLoaded', function() {
    const textAreaField = document.getElementById('mermer_gift_card_text_field');
    
    const maxLength = textAreaField.getAttribute('maxlength');

    const charCountDisplay = document.createElement('div');
    charCountDisplay.id = 'char-count-display';
    charCountDisplay.style.fontSize = '12px';
    charCountDisplay.style.marginTop = '5px';
    charCountDisplay.align = 'right';
    charCountDisplay.textContent = `0 / ${maxLength}`;

    textAreaField.parentNode.appendChild(charCountDisplay);

    textAreaField.addEventListener('input', function() {
        const currentLength = textAreaField.value.length;
        charCountDisplay.textContent = `${currentLength} / ${maxLength}`;
    });
});