import { label } from './constants.js';

const b = 10;

export const sum = (a) => {
    return label + (a + b);
}

export const deduct = (a, b) => {
    return a - b;
}

// document.querySelector('body').textContent = 'Labas';