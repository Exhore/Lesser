from youtube_transcript_api import YouTubeTranscriptApi
import sys
import re


def get_subtitles(video_id):
    transcript_list = YouTubeTranscriptApi.list_transcripts(video_id)
    transcriptions = {}

    for lang in ['es', 'en']:
        try:
            # Intentar obtener una transcripción manualmente creada
            transcript = transcript_list.find_manually_created_transcript([
                                                                          lang])
        except:
            try:
                # Si no se encuentra una transcripción manualmente creada, intentar obtener una transcripción autogenerada
                transcript = transcript_list.find_generated_transcript([lang])
            except:
                print(
                    f"No se encontró una transcripción para el idioma '{lang}'")
                continue

        # Obtener la lista de subtítulos
        subtitles_list = transcript.fetch()

        # Extraer solo el texto de cada subtítulo
        subtitles_text = [sub['text'] for sub in subtitles_list]

        # Unir todos los textos en una sola cadena
        subtitles_string = ' '.join(subtitles_text)

        # Eliminar texto entre corchetes
        subtitles_string = re.sub(r'\[.*?\]', '', subtitles_string)

        transcriptions[lang] = subtitles_string

    return transcriptions


if __name__ == "__main__":
    video_id = sys.argv[1]
    transcriptions = get_subtitles(video_id)
    print("Transcripción en español:", transcriptions.get('es', 'No disponible'))
    print("Transcripción en inglés:", transcriptions.get('en', 'No disponible'))
