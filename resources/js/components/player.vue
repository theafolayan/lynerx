<template>
    <div>
       <div :data-vimeo-id="lesson.video_id" data-video-width ="1240" id="handstick" v-if="lesson"> </div>
    </div>
</template>
    
 <script>
import Player from '@vimeo/player';
import Swal from 'sweetalert2';
import Axiox from 'axios';
import Axios from 'axios';
export default {
    props: ['default_lesson', 'next_lesson_url'],
    
data(){
        return{
            lesson: JSON.parse(this.default_lesson),
        }
    },
    mounted(){
        // this.displayVideoEndedAlert();
       
        const player = new Player('handstick');

        player.on('play', ()=>{
            console.log('video is playing');
        });
        player.on('ended', ()=>{
             this.completeLesson();
            this.displayVideoEndedAlert();
            
        });
    },
    methods: {
        displayVideoEndedAlert(){
            Swal.fire('Yay, You just completed this lesson!')
           
        },
        completeLesson(){
            Axios.post(`/series/complete-lesson/ ${this.lesson.id}`, {})
            .then(response=>{
                this.displayVideoEndedAlert();
                console.log(response)
            }).catch((error)=> {
                console.log(error)
            })
        }
    }
}
</script>   