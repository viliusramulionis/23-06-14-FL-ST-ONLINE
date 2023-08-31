import { useState, useEffect } from 'react';
//Peradresavimo funkcija (Redirect Hook)
import { useNavigate, useParams } from 'react-router-dom';

const EditPost = () => {
    const [data, setData] = useState({
        title: '',
        author: '',
        category: '',
        image: '',
        content: '',
        excerpt: ''
    });
    const navigate = useNavigate();
    const { id } = useParams();

    useEffect(() => {
        fetch('http://localhost:3000/posts/' + id)
        .then(resp => resp.json())
        .then(resp => {
            delete resp.id;
            setData(resp);
        });
    }, []);

    const handleChange  = (e) => {
        setData({ ...data, [e.target.name]: e.target.value });
    }

    const handleForm = (e) => {
        e.preventDefault();

        fetch('http://localhost:3000/posts/' + id, {
            method: 'PUT', //Metodo kuriuo siųsime užklausą nustatymas
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
            <h2>Įrašo redagavimas</h2>
            <form onSubmit={handleForm}>
                <div className="mb-3">
                    <label>Pavadinimas:</label>
                    <input 
                        type="text" 
                        className="form-control" 
                        name="title"
                        onChange={handleChange}
                        required={true}
                        value={data.title}
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
                        value={data.author}
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
                        value={data.category}
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
                        value={data.image}
                    />
                </div>
                <div className="mb-3">
                    <label>Tekstas:</label>
                    <textarea 
                        className="form-control" 
                        name="content"
                        onChange={handleChange}
                        required={true}
                        value={data.content}
                    ></textarea>
                </div>
                <div className="mb-3">
                    <label>Ištrauka:</label>
                    <textarea 
                        className="form-control" 
                        name="excerpt"
                        onChange={handleChange}
                        required
                        value={data.excerpt}
                    ></textarea>
                </div>
                <button className="btn btn-primary">Išssaugoti</button>
            </form>
        </>
    );
}

export default EditPost;