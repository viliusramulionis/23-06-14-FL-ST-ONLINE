import { useState } from 'react';
import CommentForm from '../CommentForm/CommentForm';
import SinglePost from '../SinglePost/SinglePost';
import './Post.css';

const Post = ({ data }) => {
    const [showCard, setShowCard] = useState(false);

    return (
        <div className="card">
            {showCard && <SinglePost id={data.id} />}
            <div className="profile d-flex">
                {data.users.photo && <img src={data.users.photo} />}
                <div className="info">
                    <div className="user">{data.users.name}</div>
                    <div className="location">{data.location}</div>
                </div>
            </div>
            <img src={data.file} />
            <div className="description">
                {data.description}
            </div>
            <div className="viewCard">
                <a href="#" onClick={(e) => {
                    e.preventDefault();
                    setShowCard(true);
                }}>View All Comments</a>
            </div>
            <CommentForm id={data.id} />
        </div>
    );
}

export default Post;