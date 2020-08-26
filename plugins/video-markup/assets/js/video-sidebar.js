import { InspectorControls } from "@wordpress/block-editor";
import { TextControl, TextareaControl } from "@wordpress/components";

const VideoSidebar = ({ meta, updateMeta }) => {
  let videoObj = {};

  if (meta && typeof meta === "string") videoObj = JSON.parse(meta);

  const handleChange = (field, val) => {
    videoObj[field] = val;
    updateMeta("secondary", JSON.stringify(videoObj, null, 1));
  };

  return (
    <InspectorControls>
      <TextControl
        label="YouTube URL"
        value={videoObj.video_url}
        onChange={(val) => handleChange("video_url", val)}
      />
      <TextareaControl
        label="Embed HTML"
        value={videoObj.html}
        onChange={(val) => handleChange("html", val)}
      />
      <TextControl
        label="Title"
        value={videoObj.title}
        onChange={(val) => handleChange("title", val)}
      />
      <TextControl
        label="Width"
        value={videoObj.width}
        onChange={(val) => handleChange("width", val)}
      />
      <TextControl
        label="Height"
        value={videoObj.height}
        onChange={(val) => handleChange("height", val)}
      />
      <TextControl
        label="Thumbnail URL"
        value={videoObj.thumbnail_url}
        onChange={(val) => handleChange("thumbnail_url", val)}
      />
      <img
        className="vidObj-img"
        src={videoObj.thumbnail_url}
        width={videoObj.thumbnail_width}
        height={videoObj.thumbnail_height}
      />
    </InspectorControls>
  );
};

export default VideoSidebar;
