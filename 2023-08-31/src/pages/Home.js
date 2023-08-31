import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

const Home = () => {
    const [data, setData] = useState([]);

    useEffect(() => {
        fetch('http://localhost:3000/posts')
            .then(resp => resp.json())
            .then(resp => setData(resp));
    }, []);

    return (
        <main className="row">
            <h2 className="text-center text-uppercase pb-5">Blogas</h2>
            <section className="col-9">
                {data.map(value =>
                    <div className="card mb-4">
                        <div className="row">
                            <div className="col-5">
                                <img
                                    src={value.image}
                                    alt={value.title}
                                    style={{
                                        objectFit: 'cover',
                                        height: '100%'
                                    }} />
                                {/* <div style={{
                                    backgroundImage: `url(${value.image})`,
                                    height: '100%',
                                    width: '100%',
                                    backgroundSize: 'cover',
                                    backgroundPosition: 'center'
                                }}></div> */}
                            </div>
                            <div className="col-7 p-3">
                                <h3>{value.title}</h3>
                                <p>{value.excerpt}</p>
                                <Link
                                    to={'/post/' + value.id}
                                    className="btn btn-primary"
                                >Plačiau</Link>
                            </div>
                        </div>
                    </div>
                )}
            </section>
            <aside className="col-3">
                <div className="bg-body-secondary">

                </div>
            </aside>
        </main>
    );
}

export default Home;