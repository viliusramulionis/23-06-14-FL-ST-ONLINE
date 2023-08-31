import { useState } from 'react';
//Peradresavimo funkcija (Redirect Hook)
import { useNavigate } from 'react-router-dom';

const NewPost = () => {
    const [data, setData] = useState({});
    const navigate = useNavigate();

    const handleChange  = (e) => {
        setData({ ...data, [e.target.name]: e.target.value });
    }

    const handleForm = (e) => {
        e.preventDefault();
        
        // const data = new FormData(e.target);
        // const body = {};

        // for(const el of data.entries()) {
        //     body[el[0]] = el[1];
        // }

        //Datos formatavimas
        //2023-08-31 10:30:00
        // 8/31/2023 10:31:00
        const date = new Date();
        data.date = date.toLocaleDateString('lt-LT');

        fetch('http://localhost:3000/posts', {
            method: 'POST', //Metodo kuriuo siųsime užklausą nustatymas
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(data) //Persiunčiami duomenys
        })
        .then(resp => resp.json())
        .then(resp => navigate('/admin'));
    }

    return (
        <>
            <h2>Naujas įrašas</h2>
            <form onSubmit={handleForm}>
                <div className="mb-3">
                    <label>Pavadinimas:</label>
                    <input 
                        type="text" 
                        className="form-control" 
                        name="title"
                        onChange={handleChange}
                        required={true}
                    />
                </div>
                <div className="mb-3">
                    <label>Autorius:</label>
                    <input 
                        type="text" 
                        className="form-control" 
                        name="author"
                        onChange={handleChange}
                        required={true}
                    />
                </div>
                <div className="mb-3">
                    <label>Kategorija:</label>
                    <input 
                        type="text" 
                        className="form-control" 
                        name="category"
                        onChange={handleChange}
                        required={true}
                    />
                </div>
                <div className="mb-3">
                    <label>Nuotrauka:</label>
                    <input 
                        type="text" 
                        className="form-control" 
                        name="image"
                        onChange={handleChange}
                        required={true}
                    />
                </div>
                <div className="mb-3">
                    <label>Tekstas:</label>
                    <textarea 
                        className="form-control" 
                        name="content"
                        onChange={handleChange}
                        required={true}
                    ></textarea>
                </div>
                <div className="mb-3">
                    <label>Ištrauka:</label>
                    <textarea 
                        className="form-control" 
                        name="excerpt"
                        onChange={handleChange}
                        required
                    ></textarea>
                </div>
                <button className="btn btn-primary">Išssaugoti</button>
            </form>
        </>
    );
}

export default NewPost;