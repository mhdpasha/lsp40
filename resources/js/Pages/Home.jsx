import { motion } from 'framer-motion'

const Home = () => {

  const container = {
    hidden: { opacity: 1 },
    visible: {
      opacity: 1,
      transition: {
        staggerChildren: 0.1,
        delayChildren: 0.3
      },
    },
  };

  const item = {
    hidden: { opacity: 0, y: -100 },
    visible: { 
        opacity: 1, y: 0,
        transition: {
            ease: [0.43, 0.61, 0.33, 1],
        },
    },
  };

  return (
    <section className='mx-5 my-5'>
      <aside className='mx-auto flex justify-between items-center'>
          <motion.div className='text-6xl font-bold'
          variants={container}
          initial="hidden"
          animate="visible" >
          <div className='flex gap-4'>
            <motion.p variants={item}>Certified </motion.p>
            <motion.p variants={item}>Finest </motion.p>
            <motion.p variants={item}>Library </motion.p>
          </div>
            <motion.p variants={item} className='text-xl font-normal mt-5 max-w-[50rem]'>
            Created with Laravel 11 x Inertia.js x Framer. Creates an immersive experience both for
            clients user and business owner. Call us at the button below to get in touch.
            </motion.p>
          </motion.div>
        <motion.div className='p-[50px] bg-slate-700 rounded-lg mt-5'
            drag
            dragConstraints={{
              top: -50,
              left: -50,
              right: 50,
              bottom: 50,
            }}
            transition={{ 
              type: "spring"
             }}
          >
    
          </motion.div>
      </aside>
    </section>
  )
}

export default Home