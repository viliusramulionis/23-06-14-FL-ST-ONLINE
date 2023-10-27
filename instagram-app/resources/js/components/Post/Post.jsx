import CommentForm from '../CommentForm/CommentForm';
import './Post.css';

const Post = ({ data }) => {
    return (
        <div className="card">
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
            <CommentForm id={data.id} />
        </div>
    );
}

export default Post;