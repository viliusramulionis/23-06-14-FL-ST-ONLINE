const NewPost = () => {
    const handleForm = (e) => {
        e.preventDefault();
        
        const data = new FormData(e.target);
        const body = {};

        for(const el of data.entries()) {
            body[el[0]] = el[1];
        }

        fetch('http://localhost:3000/posts', {
            method: 'POST', //Metodo kuriuo siųsime užklausą nustatymas
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(body) //Persiunčiami duomenys
        })
        .then(resp => resp.json())
        .then(resp => console.log(resp));
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
                    />
                </div>
                <div className="mb-3">
                    <label>Autorius:</label>
                    <input 
                        type="text" 
                        className="form-control" 
                        name="author"
                    />
                </div>
                <div className="mb-3">
                    <label>Kategorija:</label>
                    <input 
                        type="text" 
                        className="form-control" 
                        name="category"
                    />
                </div>
                <div className="mb-3">
                    <label>Nuotrauka:</label>
                    <input 
                        type="text" 
                        className="form-control" 
                        name="image"
                    />
                </div>
                <div className="mb-3">
                    <label>Tekstas:</label>
                    <textarea 
                        className="form-control" 
                        name="content"
                    ></textarea>
                </div>
                <div className="mb-3">
                    <label>Ištrauka:</label>
                    <textarea 
                        className="form-control" 
                        name="excerpt"
                    ></textarea>
                </div>
                <button className="btn btn-primary">Išssaugoti</button>
            </form>
        </>
    );
}

export default NewPost;