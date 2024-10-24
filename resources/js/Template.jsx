import { Navbar, Footer } from './App/Components'
import { usePage } from '@inertiajs/react'
import { motion, AnimatePresence } from 'framer-motion'

const pageVariants = {
  initial: {
    opacity: 0,
    scale: 0.98,
    y: 20,
    filter: "blur(4px)",
    transition: {
      duration: 0.5,
      ease: [0.645, 0.045, 0.355, 1.0], // Professional cubic-bezier curve
    }
  },
  enter: {
    opacity: 1,
    scale: 1,
    y: 0,
    filter: "blur(0px)",
    transition: {
      duration: 0.5,
      ease: [0.215, 0.61, 0.355, 1.0],
      staggerChildren: 0.08,
      when: "beforeChildren",
    }
  },
  exit: {
    opacity: 0,
    scale: 1.02,
    y: -15,
    filter: "blur(4px)",
    transition: {
      duration: 0.4,
      ease: [0.76, 0, 0.24, 1],
    }
  }
}

const childVariants = {
  initial: {
    opacity: 0,
    y: 15,
    transition: {
      duration: 0.4,
      ease: [0.645, 0.045, 0.355, 1.0]
    }
  },
  enter: {
    opacity: 1,
    y: 0,
    transition: {
      duration: 0.4,
      ease: [0.215, 0.61, 0.355, 1.0]
    }
  },
  exit: {
    opacity: 0,
    y: -10,
    transition: {
      duration: 0.3,
      ease: [0.76, 0, 0.24, 1]
    }
  }
}

export default function Template({ children }) {
  const { url } = usePage()

  return (
    <motion.main 
      className="flex flex-col min-h-screen font-inter"
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      transition={{ 
        duration: 0.4,
        ease: [0.645, 0.045, 0.355, 1.0]
      }}
    >
      <motion.div
        initial={{ y: -10, opacity: 0 }}
        animate={{ y: 0, opacity: 1 }}
        transition={{
          delay: 0.2,
          duration: 0.4,
          ease: [0.215, 0.61, 0.355, 1.0]
        }}
      >
        <Navbar url={url}/>
      </motion.div>
      
      <AnimatePresence 
        mode="wait"
        onExitComplete={() => window.scrollTo(0, 0)}
      >
        <motion.article 
          className="container mx-auto flex-grow p-4 antialiased"
          key={url}
          initial="initial"
          animate="enter"
          exit="exit"
          variants={pageVariants}
        >
          <motion.div variants={childVariants}>
            {children}
          </motion.div>
        </motion.article>
      </AnimatePresence>
      
      <motion.div
        initial={{ y: 10, opacity: 0 }}
        animate={{ y: 0, opacity: 1 }}
        transition={{
          delay: 0.3,
          duration: 0.4,
          ease: [0.215, 0.61, 0.355, 1.0]
        }}
      >
        <Footer/>
      </motion.div>
    </motion.main>
  )
}