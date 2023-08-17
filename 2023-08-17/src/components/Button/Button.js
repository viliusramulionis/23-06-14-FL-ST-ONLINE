import gif from './giphy.webp';

//Funkcijos parametrai react'e vadinami propsais
const Button = ({ classes, text, style, superMygtukas }) => {
    return (
        <button 
            className={'btn btn-' + classes}
            style={style}
        >
            {/* Ternary Operator */}
            {/* {superMygtukas ? <img src={gif} /> : ''} */}

            {superMygtukas && 
                <div>
                    <img src={gif} />
                </div>
            }
            <div>{text}</div>
        </button>
    );
}

export default Button;