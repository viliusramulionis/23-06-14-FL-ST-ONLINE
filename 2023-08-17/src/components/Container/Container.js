const Container = ({ children, title }) => {
    return (
        <div className="container">
            <h1>{title}</h1>
            {children}
        </div>
    );
}

export default Container;

