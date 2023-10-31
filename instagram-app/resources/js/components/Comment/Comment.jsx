import parser from "html-react-parser";
import "./Comment.css";

const Comment = ({ data }) => {
    const createdAt = new Date(data.created_at);
    const updatedAt = new Date(data.updated_at);
    
    // Datos konvertavimui (Metai, mėnuo, diena)
    // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toLocaleDateString
    // Laiko konvertavimas
    // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toLocaleTimeString
    // Data ir laikas
    // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toLocaleString
    return (
        <div className="commentCard">
            <div className="profilePicture">
                <img src={data.user.photo} alt={data.user.name} />
            </div>
            <div className="commentText">
                <strong className="userName">{data.user.name}</strong>
                {parser(data.text.replaceAll("\n", "<br />"))}
                <div className="info">
                    {updatedAt > createdAt && <span>Edited</span>}
                </div>
            </div>
        </div>
    );
};

export default Comment;
