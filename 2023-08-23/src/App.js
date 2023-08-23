import { useState, useEffect } from 'react';
import './App.css';

const App = () => {
  const [data, setData] = useState([]);
  const [loading, setLoading] = useState(false);

  useEffect(() => {
    setData(JSON.parse(localStorage.getItem('products')));
  }, [loading]);

  return (
    <div className="container my-5">
      {loading && <div>Kraunasi...</div>}
      {data.map((product, index) => 
        <li key={index} className="d-flex justify-content-between py-1">
          <span>{product.title}</span>
          <button 
            className="btn btn-danger"
            onClick={e => {
              setLoading(true);
              setTimeout(() => {
                data.splice(index, 1);
                localStorage.setItem('products', JSON.stringify(data));
                setLoading(false);
              }, 1000);
            }}
          >Delete</button>
        </li>
      )}
    </div>
  );
}

export default App;
