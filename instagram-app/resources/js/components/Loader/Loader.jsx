import './Loader.css';

const Loader = ({ height }) => {
    return (
        <div className="loader" style={{
            height
        }}>
            <div className="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
    );
}

export default Loader;