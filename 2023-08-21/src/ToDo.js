import { useState } from 'react';

const ToDo = () => {
    const [value, setValue] = useState();
    const [list, setList] = useState([]);

    return (
        <div className="container mb-5">
            <h1>Užduočių tvarkyklė</h1>
            {/* ToDo Listo forma */}
            <form 
                className="input-group mb-5 "
                onSubmit={(e) => {
                    e.preventDefault();
                    //console.log(value);
                    //Paimame visas prieš tai buvusias reikšmes iš list masyvo ir įdedame į naują masyvą.
                    //Pabaigoje įrašome naują reikšmę į masyvą
                    //Reikšmes išsaugome su setList funkcija
                    setList([...list, { value, done: false } ]);
                }}
            >
                <input 
                    type="text" 
                    placeholder="Įveskite užduotį" 
                    className="form-control" 
                    onChange={(e) => setValue(e.target.value)}
                />
                <button className="btn btn-primary">Pridėti</button>
            </form>
            {list.map((data, index) => 
                <li 
                    className="d-flex justify-content-between my-2"
                    key={index} 
                >
                    <span
                        style={{ textDecoration: data.done ? 'line-through' : 'none' }}
                        onClick={(e) => {
                            list[index].done = true;
                            setList([...list]);
                        }}
                    >{data.value}</span>
                    <button 
                        className="btn btn-danger"
                        onClick={(e) => {
                            list.splice(index, 1);
                            setList([...list]);
                        }}
                    >Delete</button>    
                </li>
            )}
        </div>
    );
}

export default ToDo;