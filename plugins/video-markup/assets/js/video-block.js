import { registerBlockType } from "@wordpress/blocks";
import { BlockControls } from "@wordpress/block-editor";
import {
  TextControl,
  TextareaControl,
  Button,
  Notice,
} from "@wordpress/components";
import { useEntityProp } from "@wordpress/core-data";
import { useSelect } from "@wordpress/data";
import { useState, useEffect } from "@wordpress/element";

import VideoSidebar from "./video-sidebar";

registerBlockType("ilektronx/video-markup-block", {
  title: "Fallback Video",
  icon: "format-video",
  category: "common",

  attributes: {
    primaryVideo: {
      type: "string",
      source: "meta",
      meta: "wpvm_primary_video",
    },
    secondaryVideo: {
      type: "string",
      source: "meta",
      meta: "wpvm_secondary_video",
    },
  },

  edit({ className, setAttributes, attributes }) {
    const [altVideo, setAltVideo] = useState("");
    const [showError, setShowError] = useState(false);

    // On component render, if exists, parse altVideo value and set state
    useEffect(() => {
      if (attributes.secondaryVideo) {
        const altVideoObj = JSON.parse(attributes.secondaryVideo);
        setAltVideo(altVideoObj.video_url);
      }
    }, []);

    const postType = useSelect(
      (select) => select("core/editor").getCurrentPostType(),
      []
    );

    const [meta, setMeta] = useEntityProp("postType", postType, "meta");
    const primaryVideoMeta = meta["wpvm_primary_video"];
    const secondaryVideoMeta = meta["wpvm_secondary_video"];

    const getEmbedObj = useSelect((select) =>
      select("core").getEmbedPreview(altVideo)
    );

    const handleSetMeta = (metaKey, newValue) => {
      if (typeof newValue === "object") {
        const videoData = JSON.stringify(newValue, null, 0);
        setMeta({ ...meta, [`${metaKey}`]: videoData });
      } else {
        setMeta({ ...meta, [`${metaKey}`]: newValue });
      }
    };

    const updateMetaValue = (type, newValue) => {
      if (type === "primary") {
        handleSetMeta("wpvm_primary_video", newValue);
      } else {
        handleSetMeta("wpvm_secondary_video", newValue);
      }
    };

    // TODO - Fix controlled/uncontrolled component error
    const handleUpdateAlt = (val) => {
      setAltVideo(val);
    };

    const updateAltMeta = () => {
      const altVideoMeta = getEmbedObj;
      if (altVideoMeta) {
        setShowError(false);
        updateMetaValue("secondary", { ...altVideoMeta, video_url: altVideo });
      } else {
        setShowError(true);
      }
    };

    const clearAllMeta = () => {
      setAltVideo("");
      setAttributes({ primaryVideo: "", secondaryVideo: "" });
    };

    return (
      <div className={className}>
        <VideoSidebar meta={secondaryVideoMeta} updateMeta={updateMetaValue} />
        <BlockControls>
          <Button isSecondary onClick={updateAltMeta}>
            Verify Fallback URL
          </Button>
          <Button isSecondary onClick={clearAllMeta}>
            Clear Meta
          </Button>
        </BlockControls>

        <TextareaControl
          label="Paste your Mediavine markup for the primary video:"
          value={primaryVideoMeta}
          onChange={(val) => updateMetaValue("primary", val)}
        />

        <TextControl
          label="Enter the YouTube fallback video URL:"
          value={altVideo}
          help="Ex: https://www.youtube.com/watch?v=hKkVwepLB1Q"
          onChange={handleUpdateAlt}
        />

        {showError && (
          <Notice
            className="url-error"
            status="error"
            onRemove={() => setShowError(false)}
          >
            Oops! There was an problem with your URL.
          </Notice>
        )}
      </div>
    );
  },

  save() {
    return null;
  },
});
