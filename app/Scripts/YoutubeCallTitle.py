import sys
import yt_dlp


def get_video_title(url):
    ydl = yt_dlp.YoutubeDL({'quiet': True})
    info_dict = ydl.extract_info(url, download=False)
    return info_dict.get('title', None)


if __name__ == "__main__":
    video_id = sys.argv[1]
    print(get_video_title(video_id))
