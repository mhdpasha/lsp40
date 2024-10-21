import { Link, usePage } from '@inertiajs/react'
import { motion, AnimatePresence } from 'framer-motion'
import { variants } from './animate'

export default function Template({ children }) {
  const { currentRoute } = usePage().props;

  return (
    <motion.main className="flex flex-col min-h-screen font-inter"
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      transition={{ duration: 0.3 }}
      >
      <header className="text-black">
        <nav className="container mx-auto flex items-center justify-between p-4 font-semibold">
          <div>
            <p className='font-semibold text-2xl'>LSP LSP an</p>
          </div>
          <div className="flex items-center">
            <Link
              href="/"
              className={`${currentRoute === '/' ? 'bg-slate-200 p-1 px-2 rounded ' : ' hover:bg-slate-100 p-1 px-2 rounded'}`}
            >
              Home
            </Link>
            <Link
              href="/informasi"
              className={`ml-4 ${currentRoute === 'informasi' ? 'bg-slate-200 p-1 px-2 rounded ' : ' hover:bg-slate-100 p-1 px-2 rounded'}`}
            >
              Informasi
            </Link>
            <Link
              href="/sertifikasi"
              className={`ml-4 ${currentRoute === 'sertifikasi' ? 'bg-slate-200 p-1 px-2 rounded ' : ' hover:bg-slate-100 p-1 px-2 rounded'}`}
            >
              Sertifikasi
            </Link>
          </div>
        </nav>
      </header>
      <AnimatePresence initial={false} mode="wait">
        <motion.article className="container mx-auto flex-grow p-4 antialiased"
          key={currentRoute} 
          initial="initial"
          animate="enter"
          exit="exit"
          variants={variants}
        >
          {children}
        </motion.article>
      </AnimatePresence>
      <footer className='bg-slate-50 text-black'>
        <div className='container mx-auto flex items-center justify-center h-12'>
          <p className='text-sm'>© {new Date().getFullYear()} Zein</p>
        </div>
      </footer>
    </motion.main>
  )
}
