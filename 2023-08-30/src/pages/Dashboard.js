import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

const Dashboard = () => {
    const [data, setData] = useState([]);

    useEffect(() => {
        fetch('http://localhost:3000/posts')
            .then(resp => resp.json())
            .then(resp => setData(resp));
    }, []);

    return (
        <>
            <div className="d-flex justify-content-between align-items-center">
                <h2>Admino panelė</h2>
                <Link to="/new-post" className="btn btn-primary">Naujas įrašas</Link>
            </div>
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
                                <Link className="btn btn-warning">Redaguoti</Link>
                                <Link className="btn btn-danger">Ištrinti</Link>
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </>
    );
}

export default Dashboard;