let x = 10;

x += 20;

console.log(typeof x);

x += 'Labas';

console.log(x);

console.log(typeof x);

x = x * 2;

console.log(x); 

//Tikrinimas ar tai nera skaicius
console.log(isNaN(x));

x = 30;

//Kondicinė logika

if(x === 10) {
    console.log('Skaičius yra lygus dešimt');
} else {
    if(x === 30) {
        console.log('Skaičius yra trisdešimt');
    } else {
        console.log('Skaičius nėra nei dešimt nei trisdešimt');
    }
}

// If kondicijoje galime priskirti reikšmę kintamajam. Viena lygybė nėra sulyginimas
// if(x = 50) {
//     console.log('Skaičius yra lygus penkiasdešimt');
// }

// console.log(x);

x = '10';

//Du lygybės ženklai nurodo duomens tipo netikrinimą
if(x == 10) {
    console.log('Netikrinant duomens tipo reikšmė yra dešimt');
}

x = 'Labas';
//case sensitive - didžiosios ir mažosios raidės skirasi

if(x === 'Labas') {
   console.log('Stringas atitiko stringą');
} else {
    console.log('Stringas neatitiko stringo');
}

x = false;

// if(x === true) {
//     //Kazkas
// } else {
//     console.log('Veiksmas ivyko');
// }

//! - simbolizuoja bang operatorių
if(x != true) {
    console.log('Veiksmas ivyko');
}

x = true;
//Undefined
//Null
//Boolean

if(x) {
    console.log('X reikšmė yra teigiama');
}

if(!x) {
    console.log('Reiškmė yra neigiama');
}

x = 'Labas';

// Stringo ilgio tikrinimas
console.log(x.length);

