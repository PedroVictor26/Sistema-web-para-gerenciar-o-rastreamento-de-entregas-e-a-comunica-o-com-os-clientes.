const form = document.querySelector('#form');
const errorIcon = '<i class="fa-solid fa-circle-exclamation"></i>';

form.addEventListener('submit', function (e) {
    e.preventDefault();

    let isValid = true; // Variável para controlar a validade geral do formulário

    // Validação do Número de Rastreio
    const numeroRastreioInput = document.getElementById('numero_rastreio');
    const numeroRastreioBox = numeroRastreioInput.closest('.input-box');
    const numeroRastreioError = numeroRastreioBox.querySelector('.error');
    numeroRastreioError.innerHTML = '';
    numeroRastreioBox.classList.remove('invalid', 'valid');

    const numeroRastreioValidation = numeroRastreioIsValid(numeroRastreioInput.value);
    if (!numeroRastreioValidation.isValid) {
        numeroRastreioError.innerHTML = `${errorIcon} ${numeroRastreioValidation.errorMessage}`;
        numeroRastreioBox.classList.add('invalid');
        isValid = false;
    } else {
        numeroRastreioBox.classList.add('valid');
    }

    // Validação do Nome do Produto
    const nomeProdutoInput = document.getElementById('nome_produto');
    const nomeProdutoBox = nomeProdutoInput.closest('.input-box');
    const nomeProdutoError = nomeProdutoBox.querySelector('.error');
    nomeProdutoError.innerHTML = '';
    nomeProdutoBox.classList.remove('invalid', 'valid');

    const nomeProdutoValidation = nomeProdutoIsValid(nomeProdutoInput.value);
    if (!nomeProdutoValidation.isValid) {
        nomeProdutoError.innerHTML = `${errorIcon} ${nomeProdutoValidation.errorMessage}`;
        nomeProdutoBox.classList.add('invalid');
        isValid = false;
    } else {
        nomeProdutoBox.classList.add('valid');
    }

    // Validação do Email
    const emailInput = document.getElementById('email');
    const emailBox = emailInput.closest('.input-box');
    const emailError = emailBox.querySelector('.error');
    emailError.innerHTML = '';
    emailBox.classList.remove('invalid', 'valid');
    const emailValidation = emailIsValid(emailInput.value)
    if (!emailValidation.isValid) {

        emailError.innerHTML = `${errorIcon} ${emailValidation.errorMessage}`;
        emailBox.classList.add('invalid');
        isValid = false
    }
    else {
        emailBox.classList.add('valid');


    }

    // Submissão do formulário se tudo estiver válido
    if (isValid) {
        form.submit();
    }
});


function numeroRastreioIsValid(value) {

    let isValid = true;
    let errorMessage = '';

    if (!value) {
        isValid = false;
        errorMessage = 'O número de rastreio é obrigatório';
    }
    if (value.length !== 5) {
        isValid = false;
        errorMessage = 'O nome do produto deve ter 5 caracteres';
    }


    return { isValid, errorMessage };
}

function nomeProdutoIsValid(value) {

    let isValid = true;
    let errorMessage = '';

    if (!value) {
        isValid = false;
        errorMessage = 'O nome do produto é obrigatório';
    }
    
    return { isValid, errorMessage };
}


function emailIsValid(value) {
    let isValid = true;
    let errorMessage = '';

    const isEmpty = (val) => {
        return val === '';
    };

    if (isEmpty(value)) {
        isValid = false;
        errorMessage = 'O email é obrigatório';
        return { isValid, errorMessage };
    }



    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
        isValid = false;
        errorMessage = 'Digite um email valido';

    }


    return { isValid, errorMessage }
}