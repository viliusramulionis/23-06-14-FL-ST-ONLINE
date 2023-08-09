import { sum, deduct } from './functions.js';

console.log(sum(15));

const objektas = {
    pavadinimas: "reikšmė",
    automobilis: 'BMW',
    adresas: 'Geležinio vilko 12'
}

//Pirmas variantas reikšmės paėmimui
//objektas.pavadinimas

//Antras variantas
// objektas['pavadinimas']

//Trečias variantas
// const pavadinimas = objektas.pavadinimas;
// const automobilis = objektas.automobilis;
// const adresas = objektas.adresas;

//Ketvirtas variantas 
const { pavadinimas, automobilis, adresas } = objektas;

console.log(pavadinimas, automobilis, adresas);

const array = [50, 20, 30, 80, 30];

// const pirmas = array[0];
// const antras = array[1];
// const trecias = array[2];

const [pirmas, antras, trecias] = array;

console.log(pirmas, antras, trecias);

//Objekto prasukimas per ciklą

//objektas.map(val => console.log(val));
for(const key in objektas) {
    console.log(objektas[key]);
}

//Object.entries(objektas).map(val => console.log(val[0], val[1]))