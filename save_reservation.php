import * as THREE from 'three';

const scene =
new THREE.Scene();

scene.background =
new THREE.Color(
0x003366
);

const camera =
new THREE.PerspectiveCamera(

60,

window.innerWidth /
window.innerHeight,

0.1,

1000

);

camera.position.set(
0,
10,
60
);

const renderer =
new THREE.WebGLRenderer({

antialias:true

});

renderer.setSize(

window.innerWidth,

window.innerHeight

);

document.body.appendChild(

renderer.domElement

);

/* 光源 */

const ambient =
new THREE.AmbientLight(

0xffffff,
1.5

);

scene.add(ambient);

const light =
new THREE.DirectionalLight(

0xffffff,
2

);

light.position.set(
20,
50,
20
);

scene.add(light);

/* 海底 */

const floorGeo =
new THREE.PlaneGeometry(
500,
500
);

const floorMat =
new THREE.MeshStandardMaterial({

color:0x114433

});

const floor =
new THREE.Mesh(
floorGeo,
floorMat
);

floor.rotation.x =
-Math.PI/2;

scene.add(floor);

/* 魚群 */

const fishes=[];

function createFish(){

    const group =
    new THREE.Group();

    const body =
    new THREE.Mesh(

    new THREE.SphereGeometry(
    1.5,
    16,
    16
    ),

    new THREE.MeshStandardMaterial({

        color:0xff7b00

    })

    );

    body.scale.z=2;

    group.add(body);

    const tail =
    new THREE.Mesh(

    new THREE.ConeGeometry(
    1,
    2,
    3
    ),

    new THREE.MeshStandardMaterial({

        color:0xff7b00

    })

    );

    tail.rotation.z=
    Math.PI/2;

    tail.position.x=
    -2;

    group.add(tail);

    group.position.set(

    (Math.random()-0.5)*100,

    Math.random()*20,

    (Math.random()-0.5)*100

    );

    scene.add(group);

    fishes.push({

        mesh:group,

        speed:
        Math.random()*0.05+0.03,

        offset:
        Math.random()*1000

    });

}

for(let i=0;i<100;i++){

    createFish();

}

/* 氣泡 */

const bubbles=[];

for(let i=0;i<300;i++){

    const bubble =
    new THREE.Mesh(

    new THREE.SphereGeometry(
    0.08,
    8,
    8
    ),

    new THREE.MeshBasicMaterial({

        color:0xffffff

    })

    );

    bubble.position.set(

    (Math.random()-0.5)*200,

    Math.random()*50,

    (Math.random()-0.5)*200

    );

    scene.add(bubble);

    bubbles.push(bubble);

}

/* 動畫 */

function animate(){

requestAnimationFrame(
animate
);

let time=
performance.now()*0.001;

/* 魚 */

fishes.forEach(f=>{

f.mesh.position.x +=
f.speed;

f.mesh.position.y +=
Math.sin(
time+f.offset
)*0.03;

f.mesh.rotation.y =
-Math.PI/2;

if(
f.mesh.position.x > 60
){

f.mesh.position.x =
-60;

}

});

/* 氣泡 */

bubbles.forEach(b=>{

b.position.y += 0.03;

if(b.position.y > 50){

b.position.y = 0;

}

});

/* 相機漂浮 */

camera.position.x =
Math.sin(
time*0.1
)*5;

camera.position.y =
10+
Math.cos(
time*0.2
);

camera.lookAt(
0,
10,
0
);

renderer.render(
scene,
camera
);

}

animate();

window.addEventListener(
'resize',
()=>{

camera.aspect=
window.innerWidth/
window.innerHeight;

camera.updateProjectionMatrix();

renderer.setSize(

window.innerWidth,

window.innerHeight

);

}
);