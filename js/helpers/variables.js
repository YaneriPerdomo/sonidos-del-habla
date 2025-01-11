//Variables
export const $form = document.querySelector("form"); //Formulario
export const $spanValidation = document.querySelector(".validations > span");
export const $spanValidation2 = document.querySelector(".validations > .two");
export const $spanValidation3 = document.querySelector(".validations > .thren")

export const $formUser = document.querySelector("[name='user']");
export const $formPassword = document.querySelector("[name='password']");
export const $inputGroupAll = document.querySelectorAll(".input-group-text");

//Obtener referencias a los elementos del formulario: Cambiar contraseña
export let $oldPassword = document.querySelector("[name = 'oldPassword']");
export let $newPassword = document.querySelector("[name='newPassword'");
export let $passwordAgain = document.querySelector("[name='passwordAgain']")

export let $user = document.querySelector(`[name="user"]`);
export let $name = document.querySelector("[name='name']");
export let $lastname = document.querySelector("[name='lastname']");
export let $mail = document.querySelector("[name='mail']");
export let $center = document.querySelector("[name = 'center']");
export let $password = document.querySelector("[name='password']");
export let $date = document.querySelector("[name='date']");

//Arreglos
export let arrayFormLogin = [$formUser, $formPassword];
export  let arrayFormChangesPassword = [$oldPassword, $newPassword, $passwordAgain];
export let arrayFormModifyProfessionalProfile = [$user, $name, $lastname, $mail, $center]
export let arrayFormCreateProfessionalProfile = [$user, $name, $lastname, $mail, $center, $password, $passwordAgain]
export     let arrayFormAddChild = [$name, $lastname, $user, $password, $passwordAgain];
export let arrayFormMOdifyChild = [$name, $lastname, $user];

//Expresiones regulares
export const patternUser = new RegExp("[A-Za-z0-9]{6,30}$");
export const patternEmail = new RegExp(`[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}`);
export const patternLetters = new RegExp(`^[A-Za-zÑñÁáÉéÍíÓóÚú]+(?: [A-Za-zÑñÁáÉéÍíÓóÚú]+)*$`); //Pura letras

  
    