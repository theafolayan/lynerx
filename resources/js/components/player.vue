<template>
    <div>
       <div :data-vimeo-id="lesson.video_id" data-video-width ="640" id="handstick" v-if="lesson"> </div>
    </div>
</template>
    
<script>
import Player from '@vimeo/player';
export default {
    props: ['default_lesson'],
    
data(){
        return{
            lesson: JSON.parse(this.default_lesson),
        }
    },
    mounted(){
        const player = new Player('handstick');

        player.on('play', ()=>{
            console.log('video is playing');
        });
    }
}
</script>   