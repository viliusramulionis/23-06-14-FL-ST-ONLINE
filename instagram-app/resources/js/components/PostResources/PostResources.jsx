import { useState } from 'react';

const PostResources = ({ data }) => {
    const [current, setCurrent] = useState(0);

    return (
        <div className="resources">
            <div className="resourcesList" style={{
                transform: `translateX(-${current * 630}px)`
            }}>
                {data.resources.map(resource => 
                    <div className="item" key={resource.id}>
                        {resource.type === 'photo' ?
                            <img src={resource.path} />  
                            :
                            <video src={resource.path} controls></video>
                        }
                    </div>
                )}
            </div>
            <div className="resourcesPagination">
                {data.resources.map((resource, index) => 
                    <div className="item" key={index} onClick={() => setCurrent(index)}></div>
                )}
            </div>
        </div>
    );
}

export default PostResources;