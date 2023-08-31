import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

const Dashboard = () => {
    const [data, setData] = useState([]);
    const [message, setMessage] = useState();

    useEffect(() => {
        if(!message && typeof message === 'boolean')
            return;

        fetch('http://localhost:3000/posts')
            .then(resp => resp.json())
            .then(resp => setData(resp));
    }, [message]);

    const handleDelete = (id) => {
        fetch('http://localhost:3000/posts/' + id, {
            method: 'DELETE'
        })
        .then(resp => resp.json())
        .then(resp => {
            setMessage('Įrašas sėkmingai ištrintas')

            setTimeout(() => setMessage(false), 5000);
        });
    }

    return (
        <>
            <div className="d-flex justify-content-between align-items-center mb-2">
                <h2>Admino panelė</h2>
                <Link to="/new-post" className="btn btn-primary">Naujas įrašas</Link>
            </div>
            {message && 
                <div className="alert alert-success">
                    {message}
                </div>
            }
            <table className="table">
                <thead>
                    <tr>
                        <th>Pavadinimas</th>
                        <th>Autorius</th>
                        <th>Kategorija</th>
                        <th>Data</th>
                        <th>Veiksmai</th>
                    </tr>
                </thead>
                <tbody>
                    {data.map(value => 
                        <tr>
                            <td>{value.title}</td>
                            <td>{value.author}</td>
                            <td>{value.category}</td>
                            <td>{value.date}</td>
                            <td className="d-flex gap-3">
                                <Link 
                                   to={'/edit-post/' + value.id} 
                                   className="btn btn-warning"
                                >
                                    Redaguoti
                                </Link>
                                <button 
                                    className="btn btn-danger"
                                    onClick={() => handleDelete(value.id)}
                                >
                                    Ištrinti
                                </button>
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </>
    );
}

export default Dashboard;