import { useState } from 'react';
import { Link } from 'react-router-dom';

const Home = () => {
    const [search, setSearch] = useState('');
    const [data, setData] = useState([]);

    const handleSubmit = (e) => {
        e.preventDefault();

        fetch('https://www.themealdb.com/api/json/v1/1/search.php?s=' + search)
        .then(resp => resp.json())
        .then(resp => setData(resp.meals));
    }

    return (
        <>
            <h1>Meal database search</h1>
            <form 
                className="input-group"
                onSubmit={handleSubmit}
            >
                <input 
                    type="text" 
                    className="form-control"  
                    placeholder="Enter meal title"
                    onChange={(e) => setSearch(e.target.value)}
                />
                <button className="btn btn-primary">Search</button> 
            </form>
            <div className="row mt-5">
                {data.map(value => 
                    <div className="col-6 mb-3" key={value.idMeal}>
                        <Link to={'/meal/' + value.idMeal}>
                            <img src={value.strMealThumb} alt={value.strMeal} />
                        </Link>
                        <h3>{value.strMeal}</h3>
                    </div>
                )}
            </div>
        </>
    );
}

export default Home;