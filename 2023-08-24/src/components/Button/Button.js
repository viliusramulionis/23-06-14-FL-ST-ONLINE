const Button = ({ click, content, style }) => {
    return (
        <button
            className={'btn btn-' + (style ? style : 'light') }
            onClick={click}
        >{content}</button>
    );
}

export default Button;